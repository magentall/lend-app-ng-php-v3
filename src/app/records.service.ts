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

  getListJeuxFull() {
    return this.http.get<myData>('api/listjeuxfull.php')
  }

  getListPrets() {
    return this.http.get<myData>('api/listpretsfull.php')
  }

  getListPrix() {
    return this.http.get<myData>('api/listprix.php')
  }

  recPret(jeu,adh,date_pret,date_retour,prix) {
    return this.http.post<ok>('/api/addpret.php', {jeu,adh,date_pret,date_retour,prix})
  }

  addPsd(num_adh,alias,psd) {
    return this.http.post<ok>('/api/addpsd.php', {num_adh,alias,psd})
  }

  alterJeu(num_jeu,code) {
    return this.http.post<ok>('/api/alterjeu.php', {num_jeu,code})
  }

  supPret(num_pret) {
    return this.http.post<ok>('/api/supret.php', {num_pret})
  }

}

/*

| Angular 4200 | --> makes an API call --> | API Server 1234 |
| Angular 4200 | --> make API call to /api/* --> webpack dev server --> | API server 1234 |

*/
