import React from 'react';
import { StyleSheet, Text, View } from 'react-native';
import { NativeStackScreenProps } from '@react-navigation/native-stack';
import { RootStackParamList } from '../types/navigation';
import { PrimaryButton } from '../components/PrimaryButton';
import { colors } from '../theme/colors';

type Props = NativeStackScreenProps<RootStackParamList, 'Home'>;

export function HomeScreen({ route, navigation }: Props): JSX.Element {
  const { role } = route.params;

  return (
    <View style={styles.container}>
      <Text style={styles.title}>Accueil {role.toUpperCase()}</Text>

      {role === 'client' && (
        <>
          <PrimaryButton label="Mes contrats" onPress={() => navigation.navigate('ContractList')} />
          <PrimaryButton label="Mes programmes" onPress={() => navigation.navigate('ProgrammeList')} />
        </>
      )}

      {role === 'agent' && (
        <PrimaryButton label="Mon agenda" onPress={() => navigation.navigate('AgentAgenda')} />
      )}

      {role === 'admin' && (
        <>
          <PrimaryButton label="Dashboard" onPress={() => navigation.navigate('AdminDashboard')} />
          <PrimaryButton label="Demandes devis" onPress={() => navigation.navigate('QuoteRequests')} />
          <PrimaryButton label="Demandes job" onPress={() => navigation.navigate('JobRequests')} />
          <PrimaryButton label="Clients" onPress={() => navigation.navigate('ClientDirectory')} />
        </>
      )}

      <PrimaryButton label="Se déconnecter" onPress={() => navigation.navigate('Welcome')} />
    </View>
  );
}

const styles = StyleSheet.create({
  container: { flex: 1, backgroundColor: colors.bg, padding: 24, justifyContent: 'center', gap: 12 },
  title: { fontSize: 24, fontWeight: '800', marginBottom: 8, color: colors.text },
});
