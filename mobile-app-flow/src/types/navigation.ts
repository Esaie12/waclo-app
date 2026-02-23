export type UserRole = 'client' | 'agent' | 'admin';

export type RootStackParamList = {
  Welcome: undefined;
  SelectRole: undefined;
  Login: { role: UserRole };
  ForgotPassword: { role: UserRole };
  Home: { role: UserRole };
  ContractList: undefined;
  ProgrammeList: undefined;
  AgentAgenda: undefined;
  AdminDashboard: undefined;
  QuoteRequests: undefined;
  JobRequests: undefined;
  ClientDirectory: undefined;
};
