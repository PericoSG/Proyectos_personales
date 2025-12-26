import { Component } from '@angular/core';
import { MatCardModule } from '@angular/material/card';
import { MatIconModule } from '@angular/material/icon';
import { MatAnchor } from "@angular/material/button";
import { RouterLink } from "@angular/router";
@Component({
  selector: 'app-home',
  imports: [MatCardModule, MatIconModule, MatAnchor, RouterLink],
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css'],
})
export class HomeComponent {

}
