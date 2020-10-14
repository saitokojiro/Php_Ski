<?php
use App\Participant;
use PHPUnit\Framework\TestCase;

class ParticipantTest extends TestCase
{
    public function testvalidNom()
    {
        $name = new Participant();
        $name->setNom("test");
        $this->assertSame("test",$name->getNom());
    }

    public function testInvalidNom()
    {
        $this->expectException(\InvalidArgumentException::class);
        $name = new Participant();
        $name->setNom("test51s");

    }

    public function testvalidCategorie()
    {
        $cat = new Participant();
        $cat->setCategorie("M1");
        $this->assertSame("M1",$cat->getCategorie());
    }

    public function testinvalidCategorie()
    {
        $this->expectException(\InvalidArgumentException::class);
        $cat = new Participant();
        $cat->setCategorie("M1s");

    }

    public function testvalidProfil()
    {
        $prof = new Participant();
        $prof->setProfil("ASVP");
        $this->assertSame("ASVP",$prof->getProfil());
    }
    public function testinvalideProfil()
    {
        $this->expectException(\InvalidArgumentException::class);
        $prof =  new Participant();
        $prof->setProfil("ASVPs");

    }



    public function testValidMessageUser()
    {
        //$this->expectException(\LogicException::class);

        $pdo = $this->getMockBuilder(\pdo::class)
            ->disableOriginalConstructor()
            ->getMock();

        $pdo->method('exec')->willReturn(true);

        $messageUser = new Participant();
        $messageUser->setNom("Jean");

        $this->assertTrue($pdo->exec($messageUser->getNom()));
        //$this->assertSame("it's very fun", $messageUser->getMessage());

    }
    public function testInValidMessageUser()
    {
        $this->expectException(\LogicException::class);

        $pdo = $this->getMockBuilder(\pdo::class)
            ->disableOriginalConstructor()
            ->getMock();

        $pdo->method('exec')->willReturn(true);

        $messageUser = new Participant();
        $messageUser->setNom("jean5");

        $this->assertTrue($pdo->exec($messageUser->getNom()));
        //$this->assertSame("it's very fun", $messageUser->getMessage());

    }





}