import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LinkComponent } from './link/link.component';
import { Link1Component } from './link1/link1.component';

@NgModule({
  declarations: [
    AppComponent,
    LinkComponent,
    Link1Component
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
