import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'
import { useEffect } from 'react'
import nino from './assets//Images/nino.jpg'
import adulto from './assets/Images/adulto.jpg'
import { supabase } from './supabase_cliente'

function App() {
  const [count, setCount] = useState(0)
  const [adult, setAdult] = useState(false)
  const [isLoading, setIsLoading] = useState(true)
  const [data, setData] = useState([])

  useEffect(() => {
    if (count >= 18) {
      setAdult(true)
    }
  }, [count])
  useEffect(() => {
  const fetchData = async () => {
    setIsLoading(true)
    const { data, error } = await supabase.from('lista_usuarios').select('*')
    if (error) {
      console.error('Error fetching data:', error)
    } else {
      setData(data)
    }
    setIsLoading(false)
  }
  fetchData()
}, [])

  return (
    <>
      <div>
        <a href="https://vite.dev" target="_blank">
          <img src={viteLogo} className="logo" alt="Vite logo" />
        </a>
        <a href="https://react.dev" target="_blank">
          <img src={reactLogo} className="logo react" alt="React logo" />
        </a>
      </div>
      <h1>Vite + React</h1>
      <div className="card">
        <button onClick={() => setCount((count) => count + 1)}>
          count is {count}
        </button>
        <p>
          Edit <code>src/App.jsx</code> and save to test HMR
        </p>
      </div>
      <div> 
        <a>
          <img src={adult ? adulto : nino} className="logo" alt="Vite logo" />
        </a>
      </div>
      <p className="read-the-docs">
        Click on the Vite and React logos to learn more
      </p>
      <div>
        {isLoading ? (
          <p>Loading...</p>
        ) : (
          <ul className='card'>
            {data.map((item) => (
              <li key={item.id}>{item.email}</li>
            ))}
          </ul>
        )}
      </div>
    </>
  )
}

export default App
