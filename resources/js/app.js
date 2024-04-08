import "./bootstrap";

function a() {
    console.log("Foo");
}

a.num = 12;

console.log(a);

a.a = a;
console.log(a.a.a.a.a.a.a.a.a.a.a);
