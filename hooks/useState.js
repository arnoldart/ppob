function Hook(){
  return function (initialState){
    this.state = initialState;
    return [
      this.state,
      function(newState){
        this.state = newState;
      }
    ];
  }
}
const useState = new Hook();