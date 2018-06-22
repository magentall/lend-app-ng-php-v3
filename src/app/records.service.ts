import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http'

interface myData {
  obj: Array<Object>
}

interface ok {
  success: boolean,
  message: string
}

@Injectable()
export class RecordsService {

  constructor(private http: HttpClient) { }

  getData() {
	   return this.http.get<myData>('api/tabdispo.php')
  }

  getDataCat(categorie) {
	   return this.http.post<myData>('api/tabdispocat.php',{categorie})
  }

  getListAdhe() {
    return this.http.get<myData>('api/listadhe.php')
  }

  getListPrix() {
    return this.http.get<myData>('api/listprix.php')
  }

  recPret(jeu,adh,date_pret,date_retour,prix) {
    return this.http.post<ok>('/api/addpret.php', {jeu,adh,date_pret,date_retour,prix})
  }

}

/*

| Angular 4200 | --> makes an API call --> | API Server 1234 |
| Angular 4200 | --> make API call to /api/* --> webpack dev server --> | API server 1234 |

*/
