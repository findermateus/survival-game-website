describe('Teste Navegação', () => {
  it('gets home', () => {
    cy.visit('/')
  });
  it ('gets participate', () => {
    cy.visit('/')
    cy.get('ul').contains('Participe').click()
    cy.url().should('include', '/contribute')
  });
  it ('gets to game demo', () => {
    cy.visit('/')
    cy.get('a').contains('Ver mais').click()
    cy.wait(3000)
    cy.origin('https://itch.io', () => {
      cy.url().should('include', 'itch.io')
    })
  });
})