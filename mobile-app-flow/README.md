# Waclo Mobile Flow (Expo + TypeScript)

Application mobile **de démonstration du flow** (sans connexion API pour l'instant).

## Flow inclus

- Welcome
- Sélection du rôle (Client / Agent / Admin)
- Connexion (mock)
- Mot de passe oublié (mock)
- Home selon le rôle
  - Client: contrats, programmes
  - Agent: agenda
  - Admin: dashboard, devis, jobs, clients

## Lancer le projet

```bash
cd mobile-app-flow
npm install
npm run start
```

Puis ouvrir sur:
- Expo Go (QR code)
- iOS simulateur / Android émulateur

## Important

- Aucune API n'est appelée dans ce flow.
- Les écrans sont prêts pour intégrer les endpoints plus tard (`/api/v1/...`).
