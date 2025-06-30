import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';


export interface Etudiant {
  nom: string;
  prenom: string;
  matricule: string;
  email: string;
}
@Injectable({
  providedIn: 'root'
})

export class EtudiantService {
  private apiUrl = 'http://localhost:8000';
  constructor( private http: HttpClient) { }

  addEtudiant(etudiant: Etudiant): Observable<any> {
    return this.http.get<Etudiant[]>(`${this.apiUrl}/etudiant`);
  }
}
