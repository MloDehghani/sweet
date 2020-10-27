import api from "./Api/Api";

class Categories {

  getCategories(){
    return api.get('/api/categories').then(response => response);
  }
}

export default Categories;
