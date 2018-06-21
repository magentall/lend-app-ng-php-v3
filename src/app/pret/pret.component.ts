import { Component, OnInit } from '@angular/core';
import { RecordsService } from '../records.service'

@Component({
  selector: 'app-pret',
  templateUrl: './pret.component.html',
  styleUrls: ['./pret.component.sass']
})
export class PretComponent implements OnInit {

  tabjeudispo = []
  tabadhe = []
  tabprix = []


  constructor(private records: RecordsService) { }

  ngOnInit() {

    this.records.getData().subscribe(data =>{
          this.tabjeudispo = data.obj
        })

    this.records.getListAdhe().subscribe(data =>{
          this.tabadhe = data.obj
        })

    this.records.getListPrix().subscribe(data =>{
          this.tabprix = data.obj
        })

  }

  addpret(event){
    event.preventDefault()
    const target = event.target
    const jeu = target.querySelector('#seljeu').value
    const adh = target.querySelector('#seladh').value
    alert(adh)
    alert(jeu)
    const date_pret = target.querySelector('#date_pret').value
    const date_retour = target.querySelector('#date_retour').value
    const prix = target.querySelector('#selprix').value
    //console.log(jeu,adh,date_pret,date_retour,prix)
    this.records.recPret(jeu,adh,date_pret,date_retour,prix).subscribe(data => {

      if(data.success){
        alert(data.message)
      } else {
      window.alert(data.message)
      }
      })

  }

}
