import { router } from "@inertiajs/react";
import { useState } from "react";

export default function Login() {
  const [values, setValues] = useState({
    name: "",
    password: "",
  });

  const handleChange = ({ target }) => {
    const { name, value } = target;

    setValues((prev) => ({
      ...prev,
      [name]: value,
    }));
  };

  const submit = (e) => {
    e.preventDefault();
    router.post("/login", values);
  };

  return (
    <div>
      <h1>Login</h1>
      <form onSubmit={submit}>
        <input name="name" value={values.name} onChange={handleChange} />
        <input
          name="password"
          value={values.password}
          onChange={handleChange}
        />
        <button type="submit">Submit</button>
      </form>
    </div>
  );
}
