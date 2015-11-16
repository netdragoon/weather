<?php

namespace Canducci\Weather;

final class Terms
{
    private $arr = array();

    function __construct()
    {
        $this->load();
    }

    protected function load()
    {
        $this->arr["ec"] = "Encoberto com Chuvas Isoladas";
        $this->arr["ci"] = "Chuvas Isoladas";
        $this->arr["c"] = "Chuvas";
        $this->arr["in"] = "Instável";
        $this->arr["pp"] = "Possibilidades de Pancadas de Chuva";
        $this->arr["cm"] = "Chuva pela Manhã";
        $this->arr["cn"] = "Chuva a Noite";
        $this->arr["pt"] = "Pancadas de Chuva a Tarde";
        $this->arr["pm"] = "Pancadas de Chuva pela Manhã";
        $this->arr["np"] = "Nublado e Pancadas de Chuva";
        $this->arr["pc"] = "Pancadas de Chuva";
        $this->arr["pn"] = "Parcialmente Nublado";
        $this->arr["cv"] = "Chuvisco";
        $this->arr["ch"] = "Chuvoso";
        $this->arr["t"] = "Tempestade";
        $this->arr["ps"] = "Predomínio de Sol";
        $this->arr["e"] = "Encoberto";
        $this->arr["n"] = "Nublado";
        $this->arr["cl"] = "Céu Claro";
        $this->arr["nv"] = "Nevoeiro";
        $this->arr["g"] = "Geada";
        $this->arr["ne"] = "Neve";
        $this->arr["nd"] = "Não Definido";
        $this->arr["pnt"] = "Pancadas de Chuva a Noite";
        $this->arr["psc"] = "Possibilidade de Chuva";
        $this->arr["pcm"] = "Possibilidade de Chuva pela Manhã";
        $this->arr["pct"] = "Possibilidade de Chuva a Tarde";
        $this->arr["pcn"] = "Possibilidade de Chuva a Noite";
        $this->arr["npt"] = "Nublado com Pancadas a Tarde";
        $this->arr["npn"] = "Nublado com Pancadas a Noite";
        $this->arr["ncn"] = "Nublado com Possibilidade de Chuva a Noite";
        $this->arr["nct"] = "Nublado com Possibilidade de Chuva a Tarde";
        $this->arr["ncm"] = "Nublado com Possibilidade de Chuva pela Manhã";
        $this->arr["npm"] = "Nublado com Pancadas pela Manhã";
        $this->arr["npp"] = "Nublado com Possibilidade de Chuva";
        $this->arr["vn"] = "Variação de Nebulosidade";
        $this->arr["ct"] = "Chuva a Tarde";
        $this->arr["ppn"] = "Possibilidade de Pancada de Chuva a Noite";
        $this->arr["ppt"] = "Possibilidade de Pancada de Chuva a Tarde";
        $this->arr["ppm"] = "Possibilidade de Pancada de Chuva pela Manhã";
    }

    public function get($idx)
    {
        if (array_key_exists($idx, $this->arr))
        {
            return $this->arr[$idx];
        }
        return "";
    }
}