<?php
use App\Epreuve;
use PHPUnit\Framework\TestCase;

class EpreuveTest extends TestCase
{
    public function testvalidNom()
    {
        $name = new Epreuve();
        $name->setNom("test");
        $this->assertSame("test",$name->getNom());
    }

    public function testInvalidNom()
    {
        $this->expectException(\InvalidArgumentException::class);
        $name = new Epreuve();
        $name->setNom("test51s");

    }

    public function testvalidCategorie()
    {
        $cat = new Epreuve();
        $cat->setCategorie("M1");
        $this->assertSame("M1",$cat->getCategorie());
    }

    public function testinvalidCategorie()
    {
        $this->expectException(\InvalidArgumentException::class);
        $cat = new Epreuve();
        $cat->setCategorie("M1s");

    }

    public function testvalidProfil()
    {
        $prof = new Epreuve();
        $prof->setProfil("ASVP");
        $this->assertSame("ASVP",$prof->getProfil());
    }
    public function testinvalideProfil()
    {
        $this->expectException(\InvalidArgumentException::class);
        $prof =  new Epreuve();
        $prof->setProfil("ASVPs");

    }



}