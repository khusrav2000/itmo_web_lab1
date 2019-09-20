let yCoordinate = document.getElementById('yCoordinate');
let rRadius = document.getElementById('rRadius');
let yCoordinateValid = false;
let xCoordinateValid = false;
let rRadiusValid = false;

yCoordinate.addEventListener('input', function (event) {
    if (validYCoordinate(yCoordinate)) {
        yCoordinateValid = true;
        yCoordinate.style.cssText = `border-color: green`;
        disableCheckButton();
    } else {
        yCoordinateValid = false;
        yCoordinate.style.cssText = `border-color: red`;
        disableCheckButton();
    }
});

rRadius.addEventListener('input', function (event) {
    if (validRadius(rRadius)) {
        rRadiusValid = true;
        disableCheckButton();
        rRadius.style.cssText = `border-color: green`;
    } else {
        rRadiusValid = false;
        rRadius.style.cssText = `border-color: red`;
        disableCheckButton();
    }
});

function validYCoordinate(yCoordinate) {
    if (yCoordinate == null)
        return false;

    if (yCoordinate.length > 10000)
        return false;
    let y;
    try {
        y = parseFloat(yCoordinate.value);
    } catch (e) {
        return false;
    }

    console.log(y);

    if (-3.0 < y && y < 5.0)
        return true;

    return false;
}

function validRadius(rRadius) {
    if (rRadius == null)
        return false;

    if (rRadius.length > 10000)
        return false;

    let r;
    try{
        r = parseFloat(rRadius.value);
    } catch (e) {
        return false;
    }

    console.log(r);

    if (2.0 < r && r < 5.0)
        return true;

    return false;
}

let checkButton = document.getElementById("idForCheckPoint");

function disableCheckButton() {
    console.log(xCoordinateValid, yCoordinateValid, rRadiusValid);
    if (xCoordinateValid && yCoordinateValid && rRadiusValid)
        checkButton.disabled = false;
    else checkButton.disabled = true;
}

let countCheckedX = 0;
for (let i = -4; i <= 4; i++) {

    let checkB = document.getElementById("idForXCoordinate" + i.toString());

    checkB.addEventListener('click', function (event) {
        if (checkB.checked) {
            countCheckedX++;
        } else {
            countCheckedX--;
        }

        if (countCheckedX === 1) {
            xCoordinateValid = true;
            disableCheckButton();
        } else {

            xCoordinateValid = false;
            disableCheckButton();
        }
    });
}