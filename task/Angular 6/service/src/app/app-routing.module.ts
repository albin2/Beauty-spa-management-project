import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { LinkComponent } from './link/link.component';
import { Link1Component } from './link1/link1.component';

const routes: Routes = [
{
  path:'links', component: LinkComponent
},
{
  path:'news', component: Link1Component
}
];
@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
