<?php

class Livro {
    private $titulo;
    private $autor;
    private $emprestado;

    public function __construct($titulo, $autor) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->emprestado = false;
    }

    public function emprestar() {
        if (!$this->emprestado) {
            $this->emprestado = true;
        }
    }

    public function devolver() {
        $this->emprestado = false;
    }

    public function estaEmprestado() {
        return $this->emprestado;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getAutor() {
        return $this->autor;
    }
}


$livros = [
    new Livro("O Senhor dos Anéis", "J.R.R. Tolkien"),
    new Livro("1984", "George Orwell"),
    new Livro("Dom Quixote", "Miguel de Cervantes")
];


$livros[0]->emprestar(); 
$livros[2]->emprestar(); 
$livros[2]->devolver();  

echo "<h1>Status Final dos Livros</h1>";

foreach ($livros as $livro) {
    $situacao = $livro->estaEmprestado() ? "Emprestado" : "Disponível";

 
    echo "<p>";
    echo "<strong>Título:</strong> " . $livro->getTitulo() . "<br>";
    echo "<strong>Autor:</strong> " . $livro->getAutor() . "<br>";
    echo "<strong>Situação:</strong> " . $situacao;
    echo "</p><hr>";
}

?>