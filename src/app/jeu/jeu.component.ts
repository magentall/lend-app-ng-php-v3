import { Component, OnInit } from '@angular/core'

import { UserService } from '../user.service'

@Component({
  selector: 'app-jeu',
  templateUrl: './jeu.component.html',
  styleUrls: ['./jeu.component.sass']
})
export class JeuComponent implements OnInit {

  tabcat = []

  constructor(private user: UserService) { }

  ngOnInit() {

    this.user.getListCat().subscribe(data2 => {
          this.tabcat = data2.obj
          if(!data2.success){
            localStorage.removeItem('loggedIn')
          }
        })

  }

  addjeu(event) {
    event.preventDefault()
    const target = event.target

    const ref_jeu = target.querySelector('#ref_jeu').value
    const nom_jeu = target.querySelector('#nom_jeu').value
    const code = target.querySelector('#code').value
    const coop = target.querySelector('#coop').value
    const selcat = target.querySelector('#selcat').value
    const px_ach = target.querySelector('#px_ach').value
    const date_ach = target.querySelector('#date_ach').value
    const date_rec = target.querySelector('#date_rec').value
    const prov = target.querySelector('#prov').value
    const date_inv = target.querySelector('#date_inv').value
    const regle_jeu = target.querySelector('#regle_jeu').value
    const pieces_rech = target.querySelector('#pieces_rech').value
    const date_res = target.querySelector('#date_res').value
    const remarq = target.querySelector('#remarq').value

    this.user.ajoutJeu(ref_jeu,nom_jeu,code,coop,selcat,px_ach,date_ach,date_rec,prov,date_inv,regle_jeu,pieces_rech,date_res,remarq).subscribe(data => {

      if(data.success){
        alert(data.message)
        location.reload()
      } else {
      window.alert(data.message)
      }
      })
  }

}
