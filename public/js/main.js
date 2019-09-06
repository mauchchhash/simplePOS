/* 
$(document).ready(function() {
  $('#open-modal').on('click', function () {
    $('#modal-example').modal();
  });
});
*/

var pos = new Vue({
  el: '#pos-row',
  data: {
    activeChoice: 'category'
  },
  computed:{
    setCategory(){
      this.activeChoice = 'category'
    },
    setBeverage(){
      this.activeChoice = 'beverage'
    },
    setFood(){
      this.activeChoice = 'food'
    },
    setOther(){
      this.activeChoice = 'other'
    }
  }
})
