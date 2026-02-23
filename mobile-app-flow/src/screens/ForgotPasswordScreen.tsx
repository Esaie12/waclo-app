import React, { useState } from 'react';
import { Alert, StyleSheet, Text, TextInput, View } from 'react-native';
import { NativeStackScreenProps } from '@react-navigation/native-stack';
import { RootStackParamList } from '../types/navigation';
import { PrimaryButton } from '../components/PrimaryButton';
import { colors } from '../theme/colors';

type Props = NativeStackScreenProps<RootStackParamList, 'ForgotPassword'>;

export function ForgotPasswordScreen({ route }: Props): JSX.Element {
  const [email, setEmail] = useState('');

  return (
    <View style={styles.container}>
      <Text style={styles.title}>Reset mot de passe ({route.params.role})</Text>
      <TextInput
        value={email}
        onChangeText={setEmail}
        placeholder="Email"
        style={styles.input}
        autoCapitalize="none"
      />
      <PrimaryButton
        label="Envoyer"
        onPress={() => Alert.alert('Flow', 'Écran prêt. API non branchée.')}
      />
    </View>
  );
}

const styles = StyleSheet.create({
  container: { flex: 1, backgroundColor: colors.bg, justifyContent: 'center', padding: 24, gap: 12 },
  title: { fontSize: 22, fontWeight: '800', color: colors.text },
  input: {
    backgroundColor: colors.card,
    borderRadius: 10,
    borderColor: '#d6e1e5',
    borderWidth: 1,
    paddingHorizontal: 12,
    paddingVertical: 12,
  },
});
