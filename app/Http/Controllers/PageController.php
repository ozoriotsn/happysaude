<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $title = 'Fabrica das apostilas - Impressão de Apostilas Online';
        $description = 'Fabrica das apostilas, imprima sua apostila online, sem sair de casa, Entregas para todo o Brasil';
        $keywords = 'Fabrica das apostilas, impressão de apostilas online, impressão de apostila, impressão online, imprimir colorido, imprimir pdf, imprimir apostila, imprimir online, barato, gráfica online, impressão apostila online, 	impressão gráfica online, impressão colorida barata, impressão e encadernação online, imprimifacil, imprimi facil, imprimefacil, imprime facil, imprifacil, imprifácil, impressao e encadernacao apostilas, imprima facil, imprimir e encadernar, impressão de apostilas online sp, impressão online barata, imprimir e encadernar apostila, imprimir apostilas barato, imprimir apostila pdf, grafica para imprimir apostilas, grafica online imprimir apostila, impressão de apostila colorida, quanto custa para imprimir uma apostila, impressão de apostilas preço, impressão de pdf online, impressão colorida e encadernação, impressão on line, imprimir apostilas barato porto alegre';
        return view('pages.home', compact('title', 'description', 'keywords'));
    }


    public function about()
    {
        $title = 'Fabrica das apostilas';
        $description = 'Empresa Fabrica das apostilas';
        $keywords = 'Fabrica das apostilas';
        return view('pages.about', compact('title', 'description', 'keywords'));
    }


    public function contact()
    {
        $title = 'Fabrica das apostilas - contato';
        $description = 'Empresa Fabrica das apostilas - contato';
        $keywords = 'Fabrica das apostilas';
        return view('pages.contact', compact('title', 'description', 'keywords'));
    }
}

