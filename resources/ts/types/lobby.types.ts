export type Lobby = {
  id: string;
  status: "pending" | "connected" | "disconnected";
  host_id: number;
  peer_id: number;
  created_at: string;
  updated_at: string;
};
