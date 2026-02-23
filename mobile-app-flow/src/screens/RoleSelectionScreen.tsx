import React from 'react';
import { StyleSheet, Text, View } from 'react-native';
import { NativeStackScreenProps } from '@react-navigation/native-stack';
import { PrimaryButton } from '../components/PrimaryButton';
import { colors } from '../theme/colors';
import { RootStackParamList, UserRole } from '../types/navigation';

type Props = NativeStackScreenProps<RootStackParamList, 'SelectRole'>;

export function RoleSelectionScreen({ navigation }: Props): JSX.Element {
  const goToLogin = (role: UserRole): void => navigation.navigate('Login', { role });

  return (
    <View style={styles.container}>
      <Text style={styles.title}>Choisir un profil</Text>
      <PrimaryButton label="Je suis Client" onPress={() => goToLogin('client')} />
      <PrimaryButton label="Je suis Agent" onPress={() => goToLogin('agent')} />
      <PrimaryButton label="Je suis Admin" onPress={() => goToLogin('admin')} />
    </View>
  );
}

const styles = StyleSheet.create({
  container: { flex: 1, backgroundColor: colors.bg, justifyContent: 'center', padding: 24, gap: 12 },
  title: { fontSize: 24, fontWeight: '800', marginBottom: 8, color: colors.text },
});
