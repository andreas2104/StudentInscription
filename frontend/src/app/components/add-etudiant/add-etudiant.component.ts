import { Component } from '@angular/core';
// import { Etudiant, EtudiantService } from '../../services/etudiant.service';
import { CommonModule } from '@angular/common';
import {FormsModule} from "@angular/forms";


// @Component({
//   selector: 'app-add-etudiant',
//   standalone: true,
//   imports: [CommonModule, FormsModule],
//   templateUrl: './add-etudiant.component.html',
//   styleUrl: './add-etudiant.component.scss'
// })
// export class AddEtudiantComponent {
//  etudiant: Etudiant ={
//   nom: '',
//   prenom: '',
//   matricule: '',
//   email: ''
//  };

//  constructor(private etudiantService: EtudiantService) {}

//  submit() {
//   this.etudiantService.addEtudiant(this.etudiant).subscribe({
//     next: (res) => {
//       alert('Etudiant ajouter avec success');
//       this.etudiant = { nom: '', prenom: '',matricule: '', email: '', };
//     },
//     error: (err) => {
//       alert("Erreur:" +JSON.stringify(err.error));
//     }
//   });
//  }
// }
