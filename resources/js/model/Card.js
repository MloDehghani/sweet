import api from "./Api/Api";

class Card {
  // index() {
  //   return api.get('/cards').then(response => response);
  // }

  updateScore (card) {
    return api.post('/cards/' + card.id + '/updatescore',card).then(response => response);
  }
}

export default Card;
