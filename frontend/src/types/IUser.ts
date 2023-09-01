export interface IUser {
  id: number
  firstname: string
  lastname: string
  email: string
  is_admin: boolean
  password: string
  created_at: string
  updated_at: string
}

export type User = {
  firstName: string
  lastName: string
  email: string
  password: string
}