<?php
declare(strict_types=1);

require_once 'A.php';
require_once 'B.php';
require_once 'C.php';
require_once 'I.php';

class Demo {

    public function typeAReturnA(): A {
        echo __FUNCTION__ . "<br>";
        return new A(); 
    }

    public function typeAReturnB(): B {
        echo __FUNCTION__ . "<br>";
        return new B(); 
    }

    public function typeAReturnC(): C {
        echo __FUNCTION__ . "<br>";
        return new C(); 
    }

    public function typeAReturnI(): I {
        echo __FUNCTION__ . "<br>";
        return new class implements I { 
            public function f() { echo "Implemented I.<br>"; }
        }; 
    }

    public function typeAReturnNull(): null {
        echo __FUNCTION__ . "<br>";
        return null; 
    }

    public function typeBReturnA(): A {
        echo __FUNCTION__ . "<br>";
        return new A(); 
    }

    public function typeBReturnB(): B {
        echo __FUNCTION__ . "<br>";
        return new B(); 
    }

    public function typeBReturnC(): C {
        echo __FUNCTION__ . "<br>";
        return new C(); 
    }

    public function typeBReturnI(): I {
        echo __FUNCTION__ . "<br>";
        return new class implements I { 
            public function f() { echo "Implemented I.<br>"; }
        }; 
    }

    public function typeBReturnNull(): ?B {
        echo __FUNCTION__ . "<br>";
        return null; 
    }

    public function typeCReturnA(): A {
        echo __FUNCTION__ . "<br>";
        return new A(); 
    }

    public function typeCReturnB(): B {
        echo __FUNCTION__ . "<br>";
        return new B(); 
    }

    public function typeCReturnC(): C {
        echo __FUNCTION__ . "<br>";
        return new C(); 
    }

    public function typeCReturnI(): I {
        echo __FUNCTION__ . "<br>";
        return new class implements I { 
            public function f() { echo "Implemented I.<br>"; }
        }; 
    }

    public function typeCReturnNull(): ?C {
        echo __FUNCTION__ . "<br>";
        return null; 
    }

    public function typeIReturnA(): A {
        echo __FUNCTION__ . "<br>";
        return new A(); 
    }

    public function typeIReturnB(): B {
        echo __FUNCTION__ . "<br>";
        return new B(); 
    }

    public function typeIReturnC(): C {
        echo __FUNCTION__ . "<br>";
        return new C(); 
    }

    public function typeIReturnI(): I {
        echo __FUNCTION__ . "<br>";
        return new class implements I { 
            public function f() { echo "Implemented I.<br>"; }
        }; 
    }

    public function typeIReturnNull(): ?I {
        echo __FUNCTION__ . "<br>";
        return null; 
    }

    // Các phương thức cho trường hợp Null
    public function typeNullReturnA(): ?A {
        echo __FUNCTION__ . "<br>";
        return new A(); 
    }

    public function typeNullReturnB(): ?B {
        echo __FUNCTION__ . "<br>";
        return new B(); 
    }

    public function typeNullReturnC(): ?C {
        echo __FUNCTION__ . "<br>";
        return new C(); 
    }

    public function typeNullReturnI(): ?I {
        echo __FUNCTION__ . "<br>";
        return new class implements I { 
            public function f() { echo "Implemented I.<br>"; }
        }; 
    }

    public function typeNullReturnNull(): ?A {
        echo __FUNCTION__ . "<br>";
        return null; 
    }
}


    

$a = new A();
$a->a1();
$a->f();

$a = new B();
$a->b1();
$a->f();

// Tạo đối tượng demo từ lớp Demo
$demo = new Demo();

// Gọi tất cả các phương thức mẫu để kiểm tra
$methods = [
    'typeAReturnA',
    'typeAReturnB',
    'typeAReturnC',
    'typeAReturnI',
    'typeAReturnNull',
    'typeBReturnA',
    'typeBReturnB',
    'typeBReturnC',
    'typeBReturnI',
    'typeBReturnNull',
    'typeCReturnA',
    'typeCReturnB',
    'typeCReturnC',
    'typeCReturnI',
    'typeCReturnNull',
    'typeIReturnA',
    'typeIReturnB',
    'typeIReturnC',
    'typeIReturnI',
    'typeIReturnNull',
    'typeNullReturnA',
    'typeNullReturnB',
    'typeNullReturnC',
    'typeNullReturnI',
    'typeNullReturnNull'
];

foreach ($methods as $method) {
    $demo->$method();
}
?>