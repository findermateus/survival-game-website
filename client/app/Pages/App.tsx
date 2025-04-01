import DefaultButton from "~/Components/DefaultButton";
import Header from "~/Components/Header/Header";

const App: React.FC = () => {
    const buttonTitle = "teste legal demais ço";
    return (
        <>
            <Header activeOption={"home"} />
            <DefaultButton title={buttonTitle} />
            <DefaultButton title="salve" />
        </>
    )
}

export default App;