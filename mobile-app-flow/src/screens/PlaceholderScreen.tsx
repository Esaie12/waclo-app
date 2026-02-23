import React from 'react';
import { StyleSheet, Text, View } from 'react-native';
import { colors } from '../theme/colors';

type Props = {
  title: string;
  description: string;
};

export function PlaceholderScreen({ title, description }: Props): JSX.Element {
  return (
    <View style={styles.container}>
      <Text style={styles.title}>{title}</Text>
      <Text style={styles.desc}>{description}</Text>
    </View>
  );
}

const styles = StyleSheet.create({
  container: { flex: 1, backgroundColor: colors.bg, justifyContent: 'center', padding: 24 },
  title: { fontSize: 24, fontWeight: '800', color: colors.text, marginBottom: 8 },
  desc: { fontSize: 16, color: colors.muted, lineHeight: 22 },
});
