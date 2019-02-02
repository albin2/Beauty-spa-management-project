import { Component, OnInit } from '@angular/core';
import{student}from '../student';

@Component({
  selector: 'app-link',
  templateUrl: './link.component.html',
  styleUrls: ['./link.component.css']
})
export class LinkComponent implements OnInit {
  student= new student();

  constructor() { }

  ngOnInit() {
  }
  registration(){

  }

}
