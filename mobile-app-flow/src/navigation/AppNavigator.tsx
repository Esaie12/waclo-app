import React from 'react';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import { RootStackParamList } from '../types/navigation';
import { WelcomeScreen } from '../screens/WelcomeScreen';
import { RoleSelectionScreen } from '../screens/RoleSelectionScreen';
import { LoginScreen } from '../screens/LoginScreen';
import { ForgotPasswordScreen } from '../screens/ForgotPasswordScreen';
import { HomeScreen } from '../screens/HomeScreen';
import { PlaceholderScreen } from '../screens/PlaceholderScreen';

const Stack = createNativeStackNavigator<RootStackParamList>();

export function AppNavigator(): JSX.Element {
  return (
    <Stack.Navigator screenOptions={{ headerTitleAlign: 'center' }} initialRouteName="Welcome">
      <Stack.Screen name="Welcome" component={WelcomeScreen} options={{ title: 'Bienvenue' }} />
      <Stack.Screen name="SelectRole" component={RoleSelectionScreen} options={{ title: 'Profil' }} />
      <Stack.Screen name="Login" component={LoginScreen} options={{ title: 'Connexion' }} />
      <Stack.Screen name="ForgotPassword" component={ForgotPasswordScreen} options={{ title: 'Mot de passe oublié' }} />
      <Stack.Screen name="Home" component={HomeScreen} options={{ title: 'Accueil' }} />

      <Stack.Screen
        name="ContractList"
        children={() => (
          <PlaceholderScreen title="Mes contrats" description="Écran de listing des contrats (flow uniquement)." />
        )}
      />
      <Stack.Screen
        name="ProgrammeList"
        children={() => (
          <PlaceholderScreen title="Mes programmes" description="Écran de listing des programmes (flow uniquement)." />
        )}
      />
      <Stack.Screen
        name="AgentAgenda"
        children={() => (
          <PlaceholderScreen title="Mon agenda" description="Écran agenda agent (flow uniquement)." />
        )}
      />
      <Stack.Screen
        name="AdminDashboard"
        children={() => (
          <PlaceholderScreen title="Dashboard admin" description="Statistiques admin (flow uniquement)." />
        )}
      />
      <Stack.Screen
        name="QuoteRequests"
        children={() => (
          <PlaceholderScreen title="Demandes devis" description="Liste des devis en attente / traités (flow uniquement)." />
        )}
      />
      <Stack.Screen
        name="JobRequests"
        children={() => (
          <PlaceholderScreen title="Demandes job" description="Liste des candidatures (flow uniquement)." />
        )}
      />
      <Stack.Screen
        name="ClientDirectory"
        children={() => (
          <PlaceholderScreen title="Annuaire clients" description="Recherche/listing clients (flow uniquement)." />
        )}
      />
    </Stack.Navigator>
  );
}
