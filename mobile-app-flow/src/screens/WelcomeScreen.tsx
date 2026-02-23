import React from 'react';
import { StyleSheet, Text, View } from 'react-native';
import { NativeStackScreenProps } from '@react-navigation/native-stack';
import { RootStackParamList } from '../types/navigation';
import { PrimaryButton } from '../components/PrimaryButton';
import { colors } from '../theme/colors';

type Props = NativeStackScreenProps<RootStackParamList, 'Welcome'>;

export function WelcomeScreen({ navigation }: Props): JSX.Element {
  return (
    <View style={styles.container}>
      <Text style={styles.title}>Waclo Mobile</Text>
      <Text style={styles.subtitle}>Flow mobile prêt (sans connexion API)</Text>
      <PrimaryButton label="Commencer" onPress={() => navigation.navigate('SelectRole')} />
    </View>
  );
}

const styles = StyleSheet.create({
  container: { flex: 1, backgroundColor: colors.bg, justifyContent: 'center', padding: 24, gap: 16 },
  title: { fontSize: 32, fontWeight: '800', color: colors.text },
  subtitle: { fontSize: 16, color: colors.muted },
});
