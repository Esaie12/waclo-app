import React from 'react';
import { Pressable, StyleSheet, Text } from 'react-native';
import { colors } from '../theme/colors';

type Props = {
  label: string;
  onPress: () => void;
};

export function PrimaryButton({ label, onPress }: Props): JSX.Element {
  return (
    <Pressable style={styles.btn} onPress={onPress}>
      <Text style={styles.label}>{label}</Text>
    </Pressable>
  );
}

const styles = StyleSheet.create({
  btn: {
    backgroundColor: colors.primary,
    paddingVertical: 14,
    borderRadius: 12,
    alignItems: 'center',
  },
  label: {
    color: '#fff',
    fontWeight: '700',
    fontSize: 16,
  },
});
