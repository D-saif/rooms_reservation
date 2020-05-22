
function showForm(formIndex){

  let cards=document.querySelectorAll(".card-body-costum");
  let buttons=document.querySelectorAll(".btn-tertiary");
      // console.log(cards);
      cards.forEach(function(node) {
        node.style.display="none";
      });
      cards[formIndex].style.display="block" ;


      buttons.forEach(function(node) {
        node.style.borderStyle="none";
      });
      buttons[formIndex].style.borderBottom=" 5px solid lightgray";

     //alert(formIndex);
     //console.log(cards);
    //  document.querySelectorAll(".card-body-costum")[formIndex].style.display = "block";
}
showForm(1);




