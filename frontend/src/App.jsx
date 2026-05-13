import { useState } from 'react';
import axios from 'axios';

function App() {
  const [id, setId] = useState('');
  const [post, setPost] = useState(null);
  const [error, setError] = useState('');
  const [loading, setLoading] = useState(false);

  const consultar = async () => {
    if (!id) return;

    setLoading(true);
    setError('');
    setPost(null);

    try {
      const res = await axios.get(`http://127.0.0.1:8000/api/posts/${id}`);
      setPost(res.data);
    } catch (err) {
      if (err.response?.status === 404) {
        setError('Post no encontrado');
      } else if (err.response?.status === 422) {
        setError('ID inválido. Debe ser un número positivo.');
      } else {
        setError('Error al consultar el post');
      }
    } finally {
      setLoading(false);
    }
  };

  return (
    <div style={{ padding: '40px', fontFamily: 'Arial' }}>
      <h1>Consultar Post</h1>

      <div>
        <input
          type="number"
          value={id}
          onChange={(e) => setId(e.target.value)}
          placeholder="Ingresa el ID"
          style={{ padding: '10px', fontSize: '16px', width: '200px' }}
        />
        <button
          onClick={consultar}
          disabled={loading}
          style={{ padding: '10px 20px', marginLeft: '10px', fontSize: '16px' }}
        >
          {loading ? 'Cargando...' : 'Consultar'}
        </button>
      </div>

      {error && <p style={{ color: 'red', marginTop: '20px' }}>{error}</p>}

      {post && (
        <div style={{ marginTop: '30px', border: '1px solid #ccc', padding: '20px', borderRadius: '8px' }}>
          <h2>{post.title}</h2>
          <p><strong>ID:</strong> {post.id}</p>
          <p>{post.body}</p>
        </div>
      )}
    </div>
  );
}

export default App;
