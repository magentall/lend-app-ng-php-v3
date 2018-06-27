import { Component, OnInit } from '@angular/core'
import { RecordsService } from '../records.service'


@Component({
  selector: 'app-supmodif',
  templateUrl: './supmodif.component.html',
  styleUrls: ['./supmodif.component.sass']
})
export class SupmodifComponent implements OnInit {

  tabadhe = []
  tabjeu = []
  tabpret = []

  constructor(private records: RecordsService) { }

  ngOnInit() {

    this.records.getListAdhe().subscribe(data =>{
          this.tabadhe = data.obj
        })

    this.records.getListJeuxFull().subscribe(data =>{
          this.tabjeu = data.obj
        })

    this.records.getListPrets().subscribe(data =>{
          this.tabpret = data.obj
        })

  }

  addpsd(event){
    event.preventDefault()
    const target = event.target
    const num_adh = target.querySelector('#seladh').value
    const alias = target.querySelector('#alias').value
    const psd = target.querySelector('#passwordadd').value

    this.records.addPsd(num_adh,alias,psd).subscribe(data => {

      if(data.success){
        alert(data.message)
        location.reload()
      } else {
      window.alert(data.message)
      }
      })
  }

  alterjeu(event){
    event.preventDefault()
    const target = event.target
    const num_jeu = target.querySelector('#seljeu').value
    const code = target.querySelector('#code').value

    this.records.alterJeu(num_jeu,code).subscribe(data => {

      if(data.success){
        alert(data.message)
        location.reload()
      } else {
      window.alert(data.message)
      }
      })
  }

  supret(event){
    event.preventDefault()
    const target = event.target
    const num_pret = target.querySelector('#selpret').value

    this.records.supPret(num_pret).subscribe(data => {

      if(data.success){
        alert(data.message)
        location.reload()
      } else {
      window.alert(data.message)
      }
      })
  }

}
