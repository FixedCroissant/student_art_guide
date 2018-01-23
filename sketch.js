

//Justin Kuhn
//01/06/18
//for now, I'm just going to setup a welcome message and 10 buttons for the index for the art
var button = [];
var frm;
var enteredNum = " ";
constrain(enteredNum.length,0,3);
var spac = 150;
var formInput;
var submit;

function setup() {
  createCanvas(spac*5,spac*6);
    
  frm = createElement('form','this sends to the back-end');
  frm.attribute('action',"/back_end.php");  // i need the info for this
  frm.attribute('target', "_self");

  formInput = createInput();  
  formInput.value("");  //store entered number in the input
  frm.child(formInput);  // add the input for the  form
  
  submit = createInput('See Art');
  submit.attribute('type',"submit");  //it is type submit
  submit.position(spac*2,spac*5);  //move it below the 0 button
  frm.child(submit);  //make it a child of form
  
  background(255);
    
  for(i=0;i<10;i++){
       button[i] = createButton(i);
       button[i].mousePressed(changeNum);
       button[i].style("color:#FFFFFF; border-color:#4156A1; background-color:#4156A1; border-width:30px; border-height:30px; border-radius:5px; font-family: GlyphaLight; font-size: 16px;");
                       //using ncsu branding colors
       button[i].value = i;
  }
 
  button[1].position(spac,spac);
  button[4].position(spac,spac*2);
  button[7].position(spac,spac*3);
  button[2].position(spac*2,spac);
  button[5].position(spac*2,spac*2);
  button[8].position(spac*2,spac*3);
  button[3].position(spac*3,spac);
  button[6].position(spac*3,spac*2);
  button[9].position(spac*3,spac*3);
  button[0].position(spac*2,spac*4);
  
   
  
  
}

function draw() {
    fill(0);    
    textFont('Serif',20);
    text("Click on the numpad \nto change the background", 25,25);
    fill(255);
    noStroke();
    rect(spac,0,spac*3,spac);
    fill(0);
    textAlign(CENTER);
    text(enteredNum, spac*2+spac/2,spac/2);
}

function changeNum() {
    enteredNum = enteredNum + this.value;
}

/* Checklist

1.  Styling #427E93
2.  Input
3.  HTML Form
4.  Color
5.  Animation
    a.  do something with the text ARTS NCSU
    b.  background abstract w/ ncsu colors
        i. circles that fade in and out
        ii. stripes like the book
    c.  background images
        i.  pics from the webpage
        ii. student art photos selected at random
        
    
    

Questions

1.  How do I import the right fonts
2.  how do I make the buttons bigger
3.  how can I test the form
4.  how do I isolate the submit

 */
