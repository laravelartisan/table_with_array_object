var imgObj;
var edgeBottom;

function moveRight(){

    setInterval(function(){

        imgObj.style.left = parseInt(imgObj.style.left) + 10 + 'px';
        imgObj.style.top = parseInt(imgObj.style.top) + 10 + 'px';

        console.log((parseInt(imgObj.style.top)+ 100));
        if( (parseInt(imgObj.style.top)  + 50)>window.innerHeight){
            edgeBottom = true;
            return;
        }

    },1000);

    if(edgeBottom){
        moveUp();
    }

}

function movUp(){
    setInterval(function(){

        imgObj.style.left = parseInt(imgObj.style.left) + 10 + 'px';
        imgObj.style.top = (parseInt(imgObj.style.top) - 10) + 'px';


    },1000);
}



function init(){
    imgObj = document.getElementById('myObject');
    console.log(imgObj);
    imgObj.style.position = 'relative';
    imgObj.style.left = '0px';
    imgObj.style.top = '50px';

    moveRight();
}


//window.onload = init;
