<?php

class LinhasFaturaController extends SiteController
{
    public function createLinhaFatura($id)
    {
        $faturas = Fatura::all();
        $this->renderView('Faturas', $faturas);
    }

    public function createFatura()
    {
        $this->renderView('FaturasCreate', 0);
    }
}