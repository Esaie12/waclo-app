import React, { useMemo, useState } from 'react';
import { StyleSheet, Text, TextInput, View } from 'react-native';
import { NativeStackScreenProps } from '@react-navigation/native-stack';
import { RootStackParamList } from '../types/navigation';
import { PrimaryButton } from '../components/PrimaryButton';
import { colors } from '../theme/colors';

type Props = NativeStackScreenProps<RootStackParamList, 'Login'>;

export function LoginScreen({ route, navigation }: Props): JSX.Element {
  const { role } = route.params;
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');

  const title = useMemo(() => `Connexion ${role.toUpperCase()}`, [role]);

  return (
    <View style={styles.container}>
      <Text style={styles.title}>{title}</Text>

      <TextInput
        value={email}
        onChangeText={setEmail}
        placeholder="Email"
        keyboardType="email-address"
        autoCapitalize="none"
        style={styles.input}
      />
      <TextInput
        value={password}
        onChangeText={setPassword}
        placeholder="Mot de passe"
        secureTextEntry
        style={styles.input}
      />

      <PrimaryButton
        label="Se connecter"
        onPress={() => navigation.navigate('Home', { role })}
      />
      <PrimaryButton
        label="Mot de passe oublié"
        onPress={() => navigation.navigate('ForgotPassword', { role })}
      />
      <Text style={styles.hint}>Flow mock: aucune API appelée.</Text>
    </View>
  );
}

const styles = StyleSheet.create({
  container: { flex: 1, backgroundColor: colors.bg, padding: 24, justifyContent: 'center', gap: 12 },
  title: { fontSize: 24, fontWeight: '800', marginBottom: 8, color: colors.text },
  input: {
    backgroundColor: colors.card,
    borderRadius: 10,
    borderColor: '#d6e1e5',
    borderWidth: 1,
    paddingHorizontal: 12,
    paddingVertical: 12,
  },
  hint: { marginTop: 8, color: colors.muted, textAlign: 'center' },
});
