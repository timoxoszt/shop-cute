$( document ).ready(function() {
    document.getElementsByClassName('warning-container')[0].style.visibility = 'hidden';
    var name = ["Doraemon", "Pikachu", "Qoobee", "Bò chăm chỉ", "Heo nằm ngủ", "Cú dễ thương", "Mèo dễ thương", "Kỳ lân nằm ngủ"];
    var text = "";
    var i;
    for (i = 0; i < name.length; i++) {
        text += `\
        <div class='col'>\
            <div class='card'>\
                <img src='/img/item${i+1}.jpg' class='card-img-top' alt='...'>\
                <div class='card-body'>\
                    <h5 class='card-title'>${name[i]}</h5>\
                    <p class='card-text'>Gấu bông ${name[i]} 20cm</p>\
                    <div class='wrapper-btn'>\
                        <button class='btn btn-primary' onclick='buy()'>Purchase</button>\
                        <button class='btn btn-info' onclick='showWarning()'>Check avaiable</button>\
                    </div>\
                </div>\
            </div>\
        </div>`;
    }
    document.getElementsByClassName("shop-body")[0].innerHTML = text;
});

function showWarning() {
    document.getElementsByClassName('warning-container')[0].style.visibility = 'visible';
}

function hideWarning() {
    document.getElementsByClassName('warning-container')[0].style.visibility = 'hidden';
}