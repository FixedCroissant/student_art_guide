

//Justin Kuhn
//01/06/18
//for now, I'm just going to setup a welcome message and 10 buttons for the index for the art
var button = [];
var frm;
var enteredNum;

function setup() {
  createCanvas(300,300);
  frm = createElement('form','this sends to the back-end');
  
  background(255);
    
  for(i=0;i<10;i++){
       button[i] = createButton(i);
       button[i].mousePressed(changeBG);
       button[i].style("color:#427E93; border-color:#000000; background-color:#4156A1;");
                       //using ncsu branding colors
       
  }
 
  button[1].position(50,50);
  button[4].position(50,75);
  button[7].position(50,100);
  button[2].position(75,50);
  button[5].position(75,75);
  button[8].position(75,100);
  button[3].position(100,50);
  button[6].position(100,75);
  button[9].position(100,100);
  button[0].position(75,125);
  
   
  
  
}


function draw() {
  fill(0);    
  textFont('Helvetica',12);
  text("Click on the numpad \nto change the background", 25,25);
  text(enteredNum, 30,30);
}

function changeBG() {
  var val = random(255);
  background(val,20,200);
}

/* Checklist

1.  Styling
2.  Input
3.  HTML Form
4.  Color
5.  Animation
 */
