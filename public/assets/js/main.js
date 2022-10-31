window.onload = function() {
    var card = document.getElementsByClassName('card');
    var modalDesc = new bootstrap.Modal(document.getElementById("exampleModal"), {});
    for (var i = 0; i < card.length; i++) {
        card[i].addEventListener('click', function() {
            var idSelected = this.id;
            var src = document.getElementById(idSelected + "-img").src;
            var desc = document.getElementById(idSelected + "-desc").innerHTML;
            var title = document.getElementById(idSelected + "-title").innerHTML;
            var counter = document.getElementById(idSelected + "-counter").innerHTML;
            document.getElementById('imgprev').setAttribute('src', src);
            document.getElementById('descmod').innerText = desc;
            document.getElementById('descTitle').innerText = title;
            modalDesc.show();
        });
    }
    var fav = document.getElementsByClassName('favAdd');
    for (var i = 0; i < card.length; i++) {
        fav[i].addEventListener('click', function() {
            var idFav = this.id;
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/add/favorite/' + idFav);
            xhr.send();
        });
    }
}