import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { EtudiantComponent } from './components/etudiant/etudiant.component';

@Component({
  selector: 'app-root',
  imports: [RouterOutlet, EtudiantComponent],
  templateUrl: './app.component.html',
  styleUrl: './app.component.scss',
})
export class AppComponent {
  title = 'frontend';
}
