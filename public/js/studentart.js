var art = [];
var x = 1;
var y = 1;
var a = 255;
var speed = 1;
var ind = 0;
var ratio = [], n;
var carpixels,b;
var xdiv = 1,ydiv = 3;
var c;
var content=[];

/**
 * Small function that pulls in a return image URL based on the unique artwork ID
 * @param id Unique Artwork_ID.
 */
	function getPicURL(id){
		$.ajax({
			type: "GET",
			url: "index.php/artworkImage/"+id,
			async: false,
			success: function(data){
				content.push(data);
			}
		});
	}

	//At a minimum pull up 3 different images from the server.
	$( document ).ready(function() {
				//Get three pics from the server.
				getPicURL(3);
				getPicURL(4);
				getPicURL(5);
	});

	//p5 Function.
	function preload(){
			for(x=0;x<content.length;x++){
				art[x]=loadImage(content[x]);
			}
	}

	//p5 Function.
    function setup() {
        c = createCanvas(windowWidth, windowHeight);
        c.style('z-index', '-1');
        c.style('position', 'fixed');
        c.style('top', '0');
        c.style('left', '0');
        background(255);
        frameRate(60);
        art[0].loadPixels();
        for (n = 0; n < art.length; n++) {
            art[n].loadPixels();
            ratio[n] = art[n].width / art[n].height;
        }
    }
	//p5 Function.
    function draw() {


        if (a == 0) {
            speed *= -1; //change direction
        }
        //starting and initialization
        if (a > 254) {
            speed *= -1;
            //set new spot
            x = Math.floor(Math.random() * xdiv);
            y = Math.floor(Math.random() * ydiv);
            ind = Math.floor(Math.random() * 3);
        }

        noStroke();
        fill(255, a);
        //fade in and out a rect over the image
        placeImage();
        rect((width / xdiv * x) + (height / ydiv * ratio[ind]) - (width / (2 * xdiv)), height / ydiv * y, height / ydiv * ratio[ind], height / ydiv);

        a += speed;
    }

    //Custom Function
    function placeImage() {
        image(art[ind], (width / xdiv * x) + (height / ydiv * ratio[ind]) - (width / (2 * xdiv)), height / ydiv * y, height / ydiv * ratio[ind], height / ydiv);  //correct aspects
    }
