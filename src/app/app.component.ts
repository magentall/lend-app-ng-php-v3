import { Component } from '@angular/core';
import { RecordsService } from './records.service'
import { Title }     from '@angular/platform-browser'



/*
function log(target, name, descriptor){
  console.log(target, name, descriptor)
  const original = descriptor.value
  descriptor.value = function(...args){
    console.log("Arguments", args, "were passed in this fct")
    const result = original.apply(this, args)
    console.log("function hacked")
    return result
  }
  return descriptor
}*/

function log(className){
  //console.log(className)
  return (...args) => {
    //console.log("args", args)
    return new className(...args)
  }
}
/* not W
@log
class myExampleClass {
  constructor(arg1, arg2){
    console.log("cstr fired")
  }
}
const myClass = new myExampleClass(5, 10 */



@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.sass']
})
export class AppComponent {
  title = 'app';
  text = ' var text'
  text2 = "mgt"
  myVariable = 'ytyt'
  myVariable2 = 55
  myDisabledValue = false
  myDisabV = false

  records = [
    {
      name: 'Sizze',
      online: true
    },
    {
      name: 'SizzA',
      online: false
    },
    {
      name: 'SA',
      online: true
    }
  ]

    rec = []
// one constructor only
    constructor(private myFirstService : RecordsService,private titleService: Title) {
    //the follow not use for the record service
    //  console.log("constructor", this.aSimpleMethod(5, 2))

    this.titleService.setTitle( 'La cité des Jeux' )

     this.myVariable = ""
      this.myDisabledValue = false
      setInterval(() => {
         this.myVariable = Math.random().toString()
         this.myDisabledValue = Math.random() > 0.5
       },500)
    }

  ngOnInit(){
    this.myFirstService.getData().subscribe(data =>{
        //  console.log("we got", data.obj)
          this.rec = data.obj
        })
  }


  updateValue(e){
    this.text=e.target.value
  //  console.log(e.target.value)
  }


/*
  constructor(){
    console.log("constructor", this.aSimpleMethod(5, 2))
   this.myVariable = ""
    this.myDisabledValue = false
    setInterval(() => {
       this.myVariable = Math.random().toString()
       this.myDisabledValue = Math.random() > 0.5
     },500)

  }
  */
  callMyFunction() {
    this.myDisabV=!this.myDisabV
  //  console.log("fct called")
  }


//  @log
  aSimpleMethod(a, b){
//    console.log("heyyheyyy")
    return a*b
  }
}
