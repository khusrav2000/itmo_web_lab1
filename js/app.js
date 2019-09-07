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
    if (yCoordinate.value == null)
        return false;
    if (yCoordinate.value > 5.0)
        return false;
    if (yCoordinate.value < -3.0)
        return false;

    return true;
}

function validRadius(rRadius) {
    if (rRadius.value == null)
        return false;

    if (rRadius.value > 5.0)
        return false;

    if (rRadius.value < 2.0)
        return false;
    return true;
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