import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.css']
})
export class ProfileComponent implements OnInit {
  

user:any;
check:boolean=true;
  constructor() {
   this.user={name:'Albin',
    job:'Engineer',
    address:'123street,kannur',
    phone:['8606597597']
  };
   }
   clickcheck()
   {
     this.check=false;
   }

  ngOnInit() {
  }

}
