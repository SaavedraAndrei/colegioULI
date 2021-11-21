<?php

namespace App\Http\Controllers;


use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use Illuminate\Http\Request;
use App\Models\Ingreso;
use App\Models\Egreso;

use LaravelDaily\Invoices\Classes\Party;


class FacturaController extends Controller
{
    public function index(Request $rq)
    {   
        $ingresos = Ingreso::where('id',$rq->id)->first(); 

        // foreach ($ingresos as $ingreso) {} 

        $client = new Party([
            'name'          => 'DATOS DEL ESTUDIANTE',
            'custom_fields' => [
                'DNI del Alumno' => $ingresos->dniAlumno,
            ],
        ]);

        $customer = new Party([
            'name'          => 'DATOS DEL VENDEDOR',
            'custom_fields' => [
                'ID del Vendedor' => $ingresos->idPersonal,
            ],
        ]);

        $items = [
            (new InvoiceItem())
                ->title($ingresos->Tipo)
                ->description('Tipo de pago realizado')
                ->pricePerUnit($ingresos->pago),            
        ];

       

        $invoice = Invoice::make('FACTURA DE INGRESO')
            ->series('BIG')
            // ability to include translated invoice status
            // in case it was paid
            ->status(__('# Factura y Fecha'))
            ->sequence(667)
            ->serialNumberFormat($ingresos->id)
            ->seller($client)
            ->buyer($customer)
            ->date($ingresos->created_at)
            ->dateFormat('d-m-Y')
            ->currencySymbol('S/.')
            ->currencyCode('PEN')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->filename($client->name . ' ' . $customer->name)
            ->addItems($items)
            ->logo(public_path('storage/download.png'))
            // You can additionally save generated invoice to configured disk
            ->save('public');

        $link = $invoice->url();
        // Then send email to party with link

        // And return invoice itself to browser or have a different view
        return $invoice->stream();

    }

    public function eg(Request $rq)
    {   
        $ingresos = Egreso::where('id',$rq->id)->first(); 

        // foreach ($ingresos as $ingreso) {} 

        $client = new Party([
            'name'          => 'DATOS DEL TRABAJADOR',
            'custom_fields' => [
                'DNI del Trabajador' => $ingresos->dniPersonal,
            ],
        ]);

        $customer = new Party([
            'name'          => 'DATOS DEL VENDEDOR',
            'custom_fields' => [
                'ID del Vendedor' => $ingresos->idPersonal,
            ],
        ]);

        $items = [
            (new InvoiceItem())
                ->title('Monto pagado')
                ->description('Tipo de pago realizado')
                ->pricePerUnit($ingresos->pago),            
        ];

       

        $invoice = Invoice::make('FACTURA DE INGRESO')
            ->series('BIG')
            // ability to include translated invoice status
            // in case it was paid
            ->status(__('# Factura y Fecha'))
            ->sequence(667)
            ->serialNumberFormat($ingresos->id)
            ->seller($client)
            ->buyer($customer)
            ->date($ingresos->created_at)
            ->dateFormat('d-m-Y')
            ->currencySymbol('S/.')
            ->currencyCode('PEN')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->filename($client->name . ' ' . $customer->name)
            ->addItems($items)
            ->logo(public_path('storage/download.png'))
            // You can additionally save generated invoice to configured disk
            ->save('public');

        $link = $invoice->url();
        // Then send email to party with link

        // And return invoice itself to browser or have a different view
        return $invoice->stream();

    }
}






        
